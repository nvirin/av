var translationsEN = {
  HEADLINE: 'What an awesome module!',
  PARAGRAPH: 'Srsly!',
  PASSED_AS_TEXT: 'Hey there! I\'m passed as text value!',
  PASSED_AS_ATTRIBUTE: 'I\'m passed as attribute value, cool ha?',
  PASSED_AS_INTERPOLATION: 'Beginners! I\'m interpolated!',
  VARIABLE_REPLACEMENT: 'Hi {{name}}',
  MISSING_TRANSLATION: 'Oops! I have not been translated into German...',
  BUTTON_LANG_FR: 'Français',
  BUTTON_LANG_EN: 'Anglais'
};

var translationsFR= {
  HEADLINE: 'Quel module!',
  PARAGRAPH: 'Serieusement!',
  PASSED_AS_TEXT: 'Hey! C\'est un texte!',
  PASSED_AS_ATTRIBUTE: 'C\'est une valeur, cool hein?',
  PASSED_AS_INTERPOLATION: 'Aie!',
  VARIABLE_REPLACEMENT: 'Salut {{name}}',
  // MISSING_TRANSLATION is ... missing :) 
  BUTTON_LANG_FR: 'Français',
  BUTTON_LANG_EN: 'Anglais'
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
    'fr_*': 'de' 
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
        { language: "English", i18n: "en_*"},
        { language: "French", i18n : "fr_FR" }
    ];

    /**$scope.selectedlanguage = $scope.languages[0];**/

  // $scope.changeLanguage = function (langKey) {
  //   $translate.use(langKey);
  // };
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