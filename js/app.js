/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var PersonalApp = angular.module('PersonalApp', [
  'ngRoute',
  'controller'
]);

PersonalApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/blog', {
        templateUrl: 'partials/blog.html'
        
      }).
      when('/about', {
        templateUrl: 'partials/about.html'
        
      }).
      when('/projects', {
        templateUrl: 'partials/about.html'
        
      }).
      when('/contact', {
        templateUrl: 'partials/about.html'
        
      }).
      otherwise({
        redirectTo: '/blog'
      });
  }]);
