var translationsEN = {
  CreateTour: 'Create Tour!',
  RegisterSignin: 'Sign in/ Register!',
  Parsalaventouravecmoi: 'Get this AvenTour with me',
 
  BUTTON_LANG_FR: 'Fr',
  BUTTON_LANG_EN: 'En'
};

var translationsFR= {
  CreateTour: 'Creer Tour!',
  RegisterSignin: 'Se connecter / S\'enregistrer',
  Parsalaventouravecmoi: 'Pars à l\'AvenTour avec moi',

  // MISSING_TRANSLATION is ... missing :) 
  BUTTON_LANG_FR: 'Fr',
  BUTTON_LANG_EN: 'En'
};

//var app = angular.module('myApp', ['pascalprecht.translate']);
var app = angular.module('myApp', ['pascalprecht.translate','ngCookies']);

app.config(['$translateProvider', function ($translateProvider) {


  // add translation tables
  $translateProvider.translations('en', translationsEN);
  $translateProvider.translations('fr', translationsFR);
  //$translateProvider.preferredLanguage('en');
  $translateProvider.fallbackLanguage('en');
  $translateProvider.registerAvailableLanguageKeys(['en', 'fr'], {
    'en_*': 'en',
    'fr_*': 'fr' 
  })
  $translateProvider.determinePreferredLanguage();
  //$translateProvider.useCookieStorage();
  $translateProvider.useLocalStorage();
}]);

app.controller('Ctrl', ['$translate', '$scope', function ($translate, $scope) {

  $scope.option = function(type){
        console.log(type) //this display the i18n value of languages
        $translate.use(type);
    }

    $scope.languages = [
        { language: "English", i18n: "en"}, 
        { language: "French", i18n : "fr" } 
    ];

     $scope.selectedlanguage = $scope.languages[0].i18n;

    /**$scope.selectedlanguage = $scope.languages[0];**/

  $scope.changeLanguage = function (langKey) {
    $translate.use(langKey);
  };
}]);

// var translations = { 
//   HEADLINE: 'What an awesome module!',
//   PARAGRAPH: 'Srslyl!'
// };
 
// var app = angular.module('myApp', ['pascalprecht.translate']);
 
// app.config(['$translateProvider', function ($translateProvider) {
//   // add translation table
//   $translateProvider.translations('en', translations);
//   $translateProvider.preferredLanguage('en');
// }]);
 
// app.controller('Ctrl', ['$scope', function ($scope) {
 
// }]);

// var translations = {
//   HEADLINE: 'What an awesome module!!!',
//   PARAGRAPH: 'Srslyffapp2!',
//    PARAGRAPH1: 'Srslyzapp2!',
//   NAMESPACE: {
//     PARAGRAPH: 'And it comes with awesome features!'
//   } 
// };

// var app = angular.module('myApp', ['pascalprecht.translate']);

// app.config(['$translateProvider', function ($translateProvider) {
//   // add translation table
//   $translateProvider
//     .translations('en', translations)
//     .preferredLanguage('en');
// }]);

// app.controller('Ctrl', ['$scope', '$translate', function ($scope, $translate) {
//   // expose translation via `$translate` service
//   $translate('HEADLINE').then(function (headline) {
//     $scope.headline = headline;
//   });
//   $translate('PARAGRAPH').then(function (paragraph) {
//     $scope.paragraph = paragraph; 
//   });
//   $translate('PARAGRAPH1').then(function (paragraph1) {
//     $scope.paragraph1 = paragraph1;
//   });
//   $translate('NAMESPACE.PARAGRAPH').then(function (anotherOne) {
//     $scope.namespaced_paragraph = anotherOne;
//   });
// }]);