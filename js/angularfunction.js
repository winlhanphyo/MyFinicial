app = angular.module('myApp', []);
app.controller('MyCont', ['$scope', '$http', function ($scope, $http) {
  $scope.accountlist = {};
  $scope.getdata = function () {
    fdata = {};
    fdata.getdata = "all";
    $http({
      url: "accounttask.php",
      method: "post",
      data: $.param(fdata),
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    }).then(function (response) {
      $scope.accountlist = response.data;
    })
  }
  $scope.getdata();
}])