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
                    templateUrl: 'partials/project.html',
                    MasterCtrl: 'MasterCtrl',
                    activetab: 'projects'

                }).
                when('/about', {
                    templateUrl: 'partials/about.html',
                    MasterCtrl: 'MasterCtrl',
                    activetab: 'about'

                }).
                when('/blog_fullpage/:bpost*', {
                    templateUrl: function(params){ return '/blogposts/' + params.bpost + '.html'; },
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
