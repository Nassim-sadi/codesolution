<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>@yield('title')</title> <!-- Change this for every page -->


<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles.css') }}">
@yield('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/prism.css') }}">
<script src="{{URL::asset('js/prism.js')}}"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('javascript')





<!-- script that runs the editor used in comments and creating posts-->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apikey=t4fg2chyf5cs0gpj8crwvqxtb1dpt79pgbatpo1g7astgpey
"></script>
<script>
    tinymce.init({
        selector: "#textarea-mce",
        plugins: [
            'link codesample code pagebreak hr',
            'wordcount'
        ],
        odesample_dialog_width: '400',
        codesample_dialog_height: '400',
        codesample_languages: [
            {text: 'HTML/XML', value: 'markup'},
            {text: 'JavaScript', value: 'javascript'},
            {text: 'CSS', value: 'css'},
            {text: 'PHP', value: 'php'},
            {text: 'Ruby', value: 'ruby'},
            {text: 'Python', value: 'python'},
            {text: 'Java', value: 'java'},
            {text: 'C', value: 'c'},
            {text: 'C#', value: 'csharp'},
            {text: 'C++', value: 'cpp'}
        ],
        menubar: false,
        toolbar: 'undo redo |  formatselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | removeformat   | codesample code pagebreak'
    });
</script>