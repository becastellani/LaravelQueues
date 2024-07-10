import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

// Função para aplicar o tema
function applyTheme() {
    const theme = localStorage.getItem("color-theme");
    if (theme === "dark") {
        document.documentElement.classList.add("dark");
        themeToggleLightIcon.classList.remove("hidden");
        themeToggleDarkIcon.classList.add("hidden");
    } else {
        document.documentElement.classList.remove("dark");
        themeToggleDarkIcon.classList.remove("hidden");
        themeToggleLightIcon.classList.add("hidden");
    }
}

// DARK MODE TOGGLE BUTTON
var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

// Aplica o tema ao carregar a página
applyTheme();

var themeToggleBtn = document.getElementById("theme-toggle");

themeToggleBtn.addEventListener("click", function () {
    // Alternar o tema ao clicar
    var isDarkMode = document.documentElement.classList.contains("dark");
    if (isDarkMode) {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("color-theme", "light");
    } else {
        document.documentElement.classList.add("dark");
        localStorage.setItem("color-theme", "dark");
    }
    applyTheme(); // Aplica o tema após a alternância
});

window.buscaCEP = function (cep) {
    $.ajax({
        dataType: 'json',
        url: '/buscar/cep',
        data: {
            cep: cep
        },
        type: 'GET',
        beforeSend: function () {
            blockPage();
        },
        complete: function () {
            unblockPage();
        },
        success: function (data) {
           data = data['info'];
           $('input[name="address"]').val(data.logradouro);
           $('input[name="neighborhood"]').val(data.bairro);
           $('input[name="complement"]').val(data.complemento);
           $('input[name="number"]').focus();
           $('select[name="state_id"] option[value="' + data.estado_id + '"]').prop('selected', true);
              getCidades(function () {
                $('select[name="city_id"] option[value="' + data.cidade_id + '"]').prop('selected', true);
              });



        },
        error: function () {
            alert('Erro ao buscar o CEP');
        }
    });
}

window.getCidades = function (callback) {
    var estado = $('select[name="state_id"]').val();
    $.ajax({
        dataType: 'json',
        url: '/cidades/' + estado,
        type: 'GET',
        beforeSend: function () {
            blockPage();
        },
        complete: function () {
            unblockPage();

        },
        success: function (data) {
            $('select[name="city_id"]').html('');
            $.each(data, function (index, value) {
                $('select[name="city_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
            });

            if (callback) {
                callback();
            }


        },
        error: function () {

        }
    });
}

window.blockPage = function () {
    $.blockUI({
        message: '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>',
        css: {
            border: 'none',
            backgroundColor: 'transparent',
            color: '#fff',
            zIndex: 9999
        }
    });
}

window.unblockPage = function () {
    $.unblockUI();
}