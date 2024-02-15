<?php
/**
 * Esta función utiliza una API de Pokémon para obtener un pokemon aleatorio.
 *
 */
function mostrarPokemon() {
    var idRandom = Math.floor(Math.random() * 101);

    fetch(`https://pokeapi.co/api/v2/pokemon/${idRandom}`)
        .then(response => response.json())
        .then(poke => mostrarResultado(poke))
}

/**
 * Esta función con la información de un Pokémon la muestra en el navegadot
 *
 * @param array $poke Es la información del Pokémon de la API.
 */
function mostrarResultado(poke) {
    var pokemonDiv = document.querySelector('[data-poke-card]');
    
    pokemonDiv.querySelector('[data-poke-name]').textContent = `Nombre: ${poke.name}`;
    pokemonDiv.querySelector('[data-poke-img-container]').innerHTML = `<img src="${poke.sprites.front_default}"/>`;
    pokemonDiv.querySelector('[data-poke-id]').textContent = `ID: ${poke.id}`;

    var tiposArray = poke.types.map(type => type.type.name);
    var tipo = tiposArray.join(', ');
    pokemonDiv.querySelector('[data-poke-types]').textContent = `Tipo(s): ${tipo}`;
}
?>