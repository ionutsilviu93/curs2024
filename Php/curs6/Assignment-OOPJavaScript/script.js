class Cub {
    constructor(latura) {
        this.latura = latura;
    }

    // Metoda pentru calcularea volumului
    calculVolum() {
        return this.latura ** 3;
    }

    // Metoda pentru calcularea lungimii totale a tuturor laturilor
    calculLungimeTotalaLaturi() {
        return this.latura * 12;
    }
}

// Funcția care va fi apelată la submit-ul formularului
function calculeazaCuburi(event) {
    event.preventDefault(); // Previne reîncărcarea paginii

    // Obține valorile introduse în formular
    const latura1 = parseFloat(document.getElementById('latura1').value);
    const latura2 = parseFloat(document.getElementById('latura2').value);

    // Crearea obiectelor Cub și calcularea valorilor
    const cub1 = new Cub(latura1);
    const volum1 = cub1.calculVolum();
    const lungimeTotalaLaturi1 = cub1.calculLungimeTotalaLaturi();

    const cub2 = new Cub(latura2);
    const volum2 = cub2.calculVolum();
    const lungimeTotalaLaturi2 = cub2.calculLungimeTotalaLaturi();

    // Afișarea rezultatelor pentru primul cub
    document.getElementById('volume1').textContent = `Volumul cubului: ${volum1}`;
    document.getElementById('totalEdges1').textContent = `Lungimea totală a tuturor laturilor: ${lungimeTotalaLaturi1}`;

    // Afișarea rezultatelor pentru al doilea cub
    document.getElementById('volume2').textContent = `Volumul cubului: ${volum2}`;
    document.getElementById('totalEdges2').textContent = `Lungimea totală a tuturor laturilor: ${lungimeTotalaLaturi2}`;
}

// Adăugarea unui event listener pentru formular
document.getElementById('cubForm').addEventListener('submit', calculeazaCuburi);
