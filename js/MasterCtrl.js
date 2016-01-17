/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var MasterCtrl = angular.module('MasterCtrl', []);

MasterCtrl.controller('MasterCtrl', ['$scope', '$http', '$route',
    function ($scope, $http, $route) {
        $http.get('blogposts/posts.json').then(function (response) {
            $scope.bposts = response.data.posts;


        }
        );

    }
]);
