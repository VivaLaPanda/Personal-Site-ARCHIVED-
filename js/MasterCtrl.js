/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var MasterCtrl = angular.module('MasterCtrl', []);

MasterCtrl.controller('MasterCtrl', ['$scope', '$http',
    function ($scope, $http) {
        $http.get('../BlogPosts/posts.json').then(function(response) {
            $scope.bposts = response.data.posts;

        });
    }]);