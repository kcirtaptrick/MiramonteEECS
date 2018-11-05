<!-- Bootstrap -->
<link href="/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- NProgress -->
<link href="/dashboard/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="/dashboard/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="/dashboard/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- JQVMap -->
<link href="/dashboard/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="/dashboard/build/css/custom.min.css" rel="stylesheet">
<style>
 .menu_fixed::-webkit-scrollbar {
    width: 0px; 
    background: transparent;  
 }
 #sidebar-menu i.fas, #sidebar-menu i.far, #sidebar-menu i.fal {
    margin-right: 0.8rem;
    font-size: 1.5rem;
 }
 #sidebar-menu {
    overflow-y: scroll;
    overflow-x: hidden;
 }
 #sidebar-menu ul {
    overflow-x: visible;
 }
 .nav-md #sidebar-menu {
    height: calc(100vh - 167px);
 }
 .nav-sm #sidebar-menu {
    height: calc(100vh - 70px);
 }
 .nav-sm .site_title {
    margin-top: 10px;
 }
 .nav-md .nav_title img {
    width: 40;
 }
 .nav-sm .nav_title img {
    width: 46;
 }
 #page-editor header{
    font-size: 2rem;
    text-align: center;
 }
 #page-editor .btns {
    margin-top: 0.3em;
    float: right;
 }
 #page-editor .btns btn {
    border: 1px solid #bbb;
    border-radius: 5px;
    padding: 0.45em 1em;
 }
 #page-editor .x_content {
    display: flex;
 }
 #tree-view {
     overflow: hidden;
 }
 #tree-view header {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    text-align: left;
 }
 #tree-view .tree, #tree-view .tree ul {
     margin:0;
     padding:0;
     list-style:none
 }
 #tree-view .tree ul {
     margin-left:1em;
     position:relative
 }
 #tree-view .tree ul ul {
     margin-left:.5em
 }
 #tree-view .tree ul:before {
     content:"";
     display:block;
     width:0;
     position:absolute;
     top:0;
     bottom:0;
     left:0;
     border-left:1px solid
 }
 #tree-view li {
     margin:0;
     padding:0 1em;
     line-height:2em;
     font-weight:700;
     position:relative;
     white-space: nowrap;
 }
 #tree-view .tree ul li:before {
     content:"";
     display:block;
     width:10px;
     height:0;
     border-top:1px solid;
     margin-top:-1px;
     position:absolute;
     top:1em;
     left:0
 }
 #tree-view .tree ul li:last-child:before {
     background: #fff;
     height:auto;
     top:1em;
     bottom:0
 }
 #tree-view .indicator {
     margin-right:0.7rem;
 }
 #tree-view .tree li a {
     text-decoration: none;
 }
 #tree-view .tree li button, #tree-view .tree li button:active, #tree-view .tree li button:focus {
     text-decoration: none;
     border:none;
     background:transparent;
     margin: 0;
     padding: 0;
     outline: 0;
 }
 #tree-view ul {
    list-style: none;
 }
 #tree-view ul, #tree-view li {
    cursor: pointer;
    list-style: none;
 }
 #page-editor .file {
    /*width: 80%;*/
 }
 #page-editor .file header {
    font-size: 1.5rem;
    margin-bottom: 1rem;
 }
 #ace-editor {
    height: 80vh;
    width: 100%;
 }
</style>