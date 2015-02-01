<html ng-app="contactsApp">
<title>Contacts Manager</title>
<?php echo HTML::style('css/main.css'); ?>
<body>
    
<div id="mainContainer">
    <h1 id="title">Contacts Manager</h1>
    <hr>
    <div ng-controller="ContactsController">
        <div ng-view=""></div>
    </div>
</div>
    

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
<?php echo HTML::script('js/contacts.js'); ?>
<?php echo HTML::script('js/contactsFactory.js'); ?>
</body>
</html>
