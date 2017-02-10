var socket = io.connect('http://localhost:8080', { 'forceNew': true });


var rutas = angular.module('rutas', ['ngResource'], function($interpolateProvider)
{
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

rutas.factory('socket',['$rootScope', function($rootScope){
    var socket = io.connect('http://localhost:8080');
    return{
        on: function(eventName, callback){
            socket.on(eventName, callback);
        },
        emit:function(eventName,data){
            socket.emit(eventName,data);
        }
    };
}]);
rutas.controller('comercialController', function($http, $scope, socket) 
{
    
    $scope.comercial = function()
    {
        socket.emit('comercial');
    };
});