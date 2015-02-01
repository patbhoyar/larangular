angular.module('contactsApp')
        .factory('dataFactory', ['$http', function($http) {
            var urlBase = '/laravelAngular/larangular/public/contacts/';
            var dataFactory = {};

            dataFactory.getContacts = function () {
                return $http.get(urlBase + 'getAll');
            };
            
            dataFactory.addContact = function(newContact){
                return $http.post(urlBase+'store', newContact);
            };
            
            dataFactory.editContact = function(id, contactData){
                return $http.put(urlBase+'update/' + id, contactData);
            };
            
            dataFactory.deleteContact = function(id){
                return $http.delete(urlBase + id);
            };
            
            return dataFactory;
        }]);