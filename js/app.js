var PersonalApp = angular.module('PersonalApp', [
  'ngRoute',
  'MasterCtrl'
]);

PersonalApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/blog', {
        templateUrl: 'partials/blog.html',
        MasterCtrl: 'MasterCtrl'
        
      }).
      when('/about', {
        templateUrl: 'partials/about.html',
        MasterCtrl: 'MasterCtrl'
        
      }).
      when('/projects', {
        templateUrl: 'partials/about.html',
        MasterCtrl: 'MasterCtrl'
        
      }).
      when('/contact', {
        templateUrl: 'partials/about.html',
        MasterCtrl: 'MasterCtrl'
        
      }).
      otherwise({
        redirectTo: '/blog'
      });
  }]);
