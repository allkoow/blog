var app = angular.module("myApp",[]);

// Serwis, pobierający dane z bazy danych
app.factory('Datas', function($http){

	var _tableName = '', _columnName = '', _value = 0;
	var _setConfig = function(tableName,columnName,value){
		_tableName = tableName;
		_columnName = columnName;
		_value = value;
	};

	var _getData = function(src,config){

		var config = 
		{
			params: 
			{
				table: _tableName,
				column: _columnName,
				value: _value
			}
		}

		var answer = $http.get(src,config).then( function(response){
			return response.data;

		}, function(response){
			return "Something went wrong.";
		});

		return answer;
	}

	return{
		getData: _getData,
		setConfig: _setConfig
	}
});

app.controller("headerCtrl",function($scope,$http,Datas) 
{
	Datas.setConfig('categories','',0);
	$answer = Datas.getData('simpleQuery.php').then( function(result){
		$scope.categories = result;
	});

	Datas.setConfig('authors','',0);
	$answer = Datas.getData('simpleQuery.php').then( function(result){
		$scope.authors = result;
	} );
});

app.controller("mainPageCtrl",function($scope,$http,$location,Datas) 
{
	var url = $location.absUrl().split('?');

	if(typeof url[1] == 'undefined')
	{
		var tableName = 'undefined';
		var value = 0;
	}
	else
	{
		var tableName = url[1].split("=")[0];
		var value = url[1].split("=")[1];
	}

	if(tableName == "categories")
		var columnName = "category_id";
	else
		var columnName = "author_id";

	// console.log(tableName);
	// console.log(columnName);
	// console.log(value);

	Datas.setConfig(tableName,columnName,value);
	$answer = Datas.getData('complexQuery.php').then( function(result)
	{
		$scope.posts = result;
	} );
});

app.controller("postCtrl",function($scope,$http,$location,Datas) 
{
	var postId = $location.absUrl().split('?')[1].split('=')[1];
	Datas.setConfig("posts","id",postId)
	$answer = Datas.getData("complexQuery.php").then( function(result)
	{
		$scope.post = result;
	} );

	Datas.setConfig('categories','',0)
	$answer = Datas.getData('simpleQuery.php').then( function(result)
	{
		$scope.categories = result;
		//console.log($scope.categories);
	} );

	Datas.setConfig('authors','',0)
	$answer = Datas.getData('simpleQuery.php').then( function(result)
	{
		$scope.authors = result;
	} );
});

