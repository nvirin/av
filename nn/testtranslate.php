<!doctype html>
<html ng-app="myApp">
  <head>
    <script src="https://cdn.rawgit.com/SlexAxton/messageformat.js/0.2.2/messageformat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-animate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-cookies.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-sanitize.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate/2.8.1/angular-translate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-interpolation-messageformat/2.8.1/angular-translate-interpolation-messageformat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-storage-cookie/2.8.1/angular-translate-storage-cookie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-storage-local/2.8.1/angular-translate-storage-local.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-loader-url/2.8.1/angular-translate-loader-url.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-loader-static-files/2.8.1/angular-translate-loader-static-files.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-handler-log/2.8.1/angular-translate-handler-log.js"></script>
    <script src="translate/app33.js"></script>
  </head>
  <body>

<div ng-controller="Ctrl">
  <p>{{ 'HEADLINE' | translate }}</p>
  <p>{{ 'PARAGRAPH' | translate }}</p>

  <p translate>PASSED_AS_TEXT</p>
  <p translate="PASSED_AS_ATTRIBUTE"></p>
  <p translate>{{ 'PASSED_AS_INTERPOLATION' }}</p>
  <p translate="{{ 'PASSED_AS_INTERPOLATION' }}"></p>
  <p translate="VARIABLE_REPLACEMENT" translate-values="{ name: 'PascalPrecht' }"></p>
  <p translate>MISSING_TRANSLATION</p>

  <button ng-click="changeLanguage('fr')" translate="BUTTON_LANG_FR"></button>
  <button ng-click="changeLanguage('en')" translate="BUTTON_LANG_EN"></button>

  <!-- <select name="language" ng-change="myFunc()" ng-model="myValue" class="form-control">
                <option value=""></option>
                <option value="fr">French</option>
                <option value="en">English</option>
            </select> -->

            <!-- <select  ng-model="selectedlanguage" ng-change="option(this.selectedlanguage)"  ng-options="i.language for i in languages">
            </select> -->

        

</div>


  </body>
</html>


<!-- <!doctype html>
<html ng-app="myApp">
  <head>
    <script src="https://cdn.rawgit.com/SlexAxton/messageformat.js/0.2.2/messageformat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-animate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-cookies.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-sanitize.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate/2.8.1/angular-translate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-interpolation-messageformat/2.8.1/angular-translate-interpolation-messageformat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-storage-cookie/2.8.1/angular-translate-storage-cookie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-storage-local/2.8.1/angular-translate-storage-local.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-loader-url/2.8.1/angular-translate-loader-url.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-loader-static-files/2.8.1/angular-translate-loader-static-files.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-translate-handler-log/2.8.1/angular-translate-handler-log.js"></script>
    <script src="translate/app3.js"></script>
  </head>
  <body>
    <div ng-controller="Ctrl">
      <p>{{ 'HEADLINE' | translate }}</p>
      <p>{{ 'PARAGRAPH' | translate }}</p>
    </div>
  </body>
</html> -->