function setMethod(type, method, method_price) {
    // metoda ktora pomocou post posle udaj o zvolenom sposobe platby alebo dorucenia kontroleru

    let formData = {
        type: type,
        method: method,
        method_price: method_price,
        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };

    fetch('/payment-transport', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': formData._token
        },
        body: JSON.stringify(formData)

    });

}


const kurier = document.getElementById("kurier");
const osobny_odber = document.getElementById("osobny_odber");
const karta = document.getElementById("karta");
const dobierka = document.getElementById("dobierka");
const bankovy_prevod = document.getElementById("bankovy_prevod");

// transport methods
kurier.onclick = function () {
    setMethod("transport", "kurier", 4.99)
};
osobny_odber.onclick = function () {
    setMethod("transport", "osobny_odber", 0)
};


//payment methods
karta.onclick = function () {
    setMethod("payment", "karta", 0)
};
dobierka.onclick = function () {
    setMethod("payment", "dobierka", 2.99)
};
bankovy_prevod.onclick = function () {
    setMethod("payment", "bankovy_prevod", 0)
};
