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
rutas.controller('inicioController', function($http, $scope, socket) 
{
    
    $scope.tomar_turno = function($caja, $turno, $id)
    {
        socket.emit('caja',$caja);
        socket.emit('turno',$turno);

        $http({
            method:"put",
            url: "http://agua.dev/tikets/actualizar/"+$id,
            data: ({ 'estado' : 1, 'fk_caja' : $caja  })
        }).success(function(data){
            console.log(data);
        
        }).error(function(data){
            console.log(data);
            //alert("Ha ocurrido un error al actualizar los datos");
            //console.log(id);
        })
    };
        
    socket.on('turno',function(data){
        console.log(data);
        $scope.$apply(function(){
            $scope.turno = data;
        });
    })

    socket.on('caja',function(data){
        console.log(data);
        $scope.$apply(function(){
            $scope.caja = data;
        });
    })
});