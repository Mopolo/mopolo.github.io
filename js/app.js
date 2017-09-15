(function() {

    var ageElement = document.getElementById('age');

    if (ageElement) {
        var today = new Date();
        var birth = new Date(1990, 7, 6, 0, 0, 0, 1);

        var age = today.getFullYear() - birth.getFullYear();

        if ((today.getMonth() < birth.getMonth()) || (today.getDate() < birth.getDate())) {
            age--;
        }

        document.getElementById('age').innerHTML = age + '';
    }

    function duckface(face) {
        document.getElementById('duckface').innerHTML = face;
    }

    document.getElementById('duck').addEventListener('click', function() {
        setTimeout(function() { duckface('>'); }, 200);
        setTimeout(function() { duckface('-'); }, 500);
        setTimeout(function() { duckface('>'); }, 800);
        setTimeout(function() { duckface('-'); }, 1100);
    });

})();
