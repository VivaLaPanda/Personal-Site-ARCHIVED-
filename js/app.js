var PersonalApp = angular.module('PersonalApp', [
    'ngRoute',
    'MasterCtrl'
]);

PersonalApp.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
                when('/blog', {
                    templateUrl: 'partials/blog.html',
                    MasterCtrl: 'MasterCtrl',
                    activetab: 'blog'

                }).
                when('/admin', {
                    templateUrl: 'admin/NewPost.php',
                    MasterCtrl: 'MasterCtrl',
                    activetab: 'admin'

                }).
                when('/projects', {
                    templateUrl: 'partials/about.html',
                    MasterCtrl: 'MasterCtrl',
                    activetab: 'projects'

                }).
                when('/contact', {
                    templateUrl: 'partials/about.html',
                    MasterCtrl: 'MasterCtrl',
                    activetab: 'contact'

                }).
                when('/blog_fullpage/:bpost', {
//                    templateUrl: function(params){ return '/BlogPosts/' + params.bpost + '.html'; },
                    templateUrl: '/BlogPosts/1447742276.html',
                    MasterCtrl: 'MasterCtrl',
                    activetab: 'blog'

                }).
                otherwise({
                    redirectTo: '/blog'
                });
    }]).run(['$rootScope', '$location', function ($rootScope, $location) {
        var path = function () {
            return $location.path();
        };
        $rootScope.$watch(path, function (newVal, oldVal) {
            $rootScope.activetab = newVal;
        });
    }]);
