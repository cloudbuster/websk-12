(function(){
  'use strict';
}());

// Creating module myApp, which can be called with ng-app="myApp" in the view (index.html)
var myApp = angular.module('myApp', ['ngRoute']);

// Configuring routing with routeprovider service
myApp.config(function($routeProvider){
  $routeProvider 

    // When user clicks on "#templateForm" in the view, url bind to a controller opens
    // to the view.
    .when('/templateForm', {
      templateUrl : './templates/templateForm.html',
      controller : 'templateFormController'
    })

  .when('/templateAttendees', {
    templateUrl : './templates/templateAttendees.html',
    controller : 'templateAttendeesController'
  })

  // When user click doesn't match a fallback url and controller will be opened
  // in this case they are also opened when the app is executed ()
  .otherwise( {
    templateUrl : './templates/mainTemplate.html',
    controller : 'mainTemplateController'
  });
});

// Creating custom service for storing and calling data.
// There exists a mockup object array to which user inputted
// date is pushed.
myApp.service('tempStorageService', function(){
  /* Object array to store, add and call data */ 
  // Some text that could be on a sole controller, but are here for testing the service.
  this.infoText = "We have an awesome event on 1st of September at Lutakko aukio!";
  this.buttonText = "Go ahead and register!";
});

// Creating custom filter to transform boolean data into user readable words.
myApp.filter('bool2words', function(){
  return function(x){
    if (x === true || x === 1 || x === '1'){
      return "Yes!";
    } else if (x === false || x=== 0 || x === '0'){
      return "No..."; 
    } else {
      return "No...";
    }
  };
});

// Creating filter to capitalize the first letter of dietary options that would otherwise
// be all lowercase. 
myApp.filter('capitalize', function(){
  return function(x){
    if (x){
      this.tempString = x[0].toUpperCase();
      for (var i = 1; i < x.length; i += 1){
        this.tempString += x[i];
      }
    } else { 
      this.tempString = 'No Preference';
    }
    return this.tempString;
  };
});

// Main controller is somewhat obsolete, the other controllers are nested withing the main
// controller. 
myApp.controller('mainController', function($scope){
  $scope.title = 'main';
});

myApp.controller('templateFormController', function($scope, $log, $location, $http){
  $scope.title = 'Register to ROCK!';

  $scope.register = function(){
    
    $http.post('backend.php', 
        {
          'firstName':$scope.firstName, 
          'lastName':$scope.lastName, 
          'email':$scope.email, 
          'diet':$scope.diet,
          'sauna':$scope.sauna
        }
        )
      .then (function successCallback(data, status, headers, config){
        $log.info('Data inserted.');
      }, function errorCallback(){
        $log.info('Error. Data was not inserted.');
      });

    $location.path('/templateAttendees');
  };
});

myApp.controller('templateAttendeesController', function($scope, $log, $http){
  $scope.title = 'These people have registered to ROCK!';

  $scope.users = {};

  $http({ method: 'get', url: 'backend.php'})
  .then (function successCallback(response){
    $scope.users = response.data;
  }, function errorCallback(reason){
    $log.info('Error' + reason);
  });

});

// Just some scopes to be shown for the user at mainTemplate which is controlled by
// mainTemplateController. Nothing fancy here.
myApp.controller('mainTemplateController', function($scope, tempStorageService){
  $scope.title = 'A ROCKing event';
  $scope.info = tempStorageService.infoText;
  $scope.btnText = tempStorageService.buttonText;
});
