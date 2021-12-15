$(document).ready(function showNameFile() {
    var $input = document.getElementById('namearquivo'),
        $fileName = document.getElementById('file-name');


    var children = '';
    $input.addEventListener('change', function() {
        for (let index = 0; index < $input.files.length; index++) {

            children += '<li>' + $input.files.item(index).name + '</li>'


        }
        $fileName.innerHTML = '<ul>' + children + '</ul>'
    });
})