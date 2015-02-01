angular.module('contactsApp', ['ngRoute'])
        .config(['$routeProvider', function($rp){
           $rp
            .when('/', {
                templateUrl:'/laravelAngular/larangular/public/partials/list.html'
            })
            .when('/edit/:index', {
                templateUrl:'/laravelAngular/larangular/public/partials/edit.html',
                controller: 'EditController'
            })
            .when('/add', {
                templateUrl:'/laravelAngular/larangular/public/partials/add.html',
                controller: 'AddController'
            })
        }])
        .controller('ContactsController', [ '$scope', 'dataFactory', function($scope, dataFactory){ 
            (function(){
                dataFactory.getContacts()
                        .success(function (contacts) {
                    $scope.contacts = contacts;
                })
            })();
        }])
        .controller('EditController', ['$scope', '$routeParams', '$location', 'dataFactory',
            function($scope, $routeParams, $location, dataFactory){
                $scope.contact = $scope.contacts[$routeParams.index];
                $scope.index = $routeParams.index;

                $scope.save = function(){
                    dataFactory.editContact($scope.contact.id, $scope.contact)
                            .success(function(data, status, headers, config) {
                        if(data == "success")
                            $location.path('/').replace();
                    });
                };

                $scope.delete = function(){
                    dataFactory.deleteContact($scope.contact.id)
                            .success(function(response){
                        if(response == "success"){
                            $scope.contacts.splice($scope.index,1);
                            $location.path('/').replace();
                        }
                    });
                };
        }])
        .controller('AddController', [ '$scope', '$location', 'dataFactory', function($scope, $location, dataFactory){
            
            $scope.contact = {name: '', email: '', mobile: ''};
            $scope.contacts.push($scope.contact);
            
            $scope.save = function(){
                dataFactory.addContact($scope.contact).success(function (data) {
                    if(data.msg === "success"){
                        $scope.contact.id = data.id;
                        $location.path('/').replace();
                    }
                });
            };
            
            $scope.cancel = function(){
                var len = $scope.contacts.length;
                $scope.contacts.splice(len-1, 1);
                $location.path('/').replace();
            };
        }]);