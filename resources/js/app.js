/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

require( '../../public/custom_ckeditor/ckeditor5/packages/ckeditor5-build-classic/build/ckeditor.js' );
const maxCharacters = 7500;
const container = document.querySelector( '.content-update' );
const progressCircle = document.querySelector( '.content-update__chart__circle' );
const charactersBox = document.querySelector( '.content-update__chart__characters' );
const wordsBox = document.querySelector( '.content-update__words' );
const circleCircumference = Math.floor( 2 * Math.PI * progressCircle.getAttribute( 'r' ) );
const sendButton = document.querySelector( '.desarrollo' );

ClassicEditor
    .create( document.querySelector( '#content' ),{
        toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable' ],
        wordCount: {
            onUpdate: stats => {
                const charactersProgress = stats.characters / maxCharacters * circleCircumference;
                const isLimitExceeded = stats.characters > maxCharacters;
                const isCloseToLimit = !isLimitExceeded && stats.characters > maxCharacters * .8;
                const circleDashArray = Math.min( charactersProgress, circleCircumference );

                // Set the stroke of the circle to show how many characters were typed.
                progressCircle.setAttribute( 'stroke-dasharray', `${ circleDashArray },${ circleCircumference }` );

                // Display the number of characters in the progress chart. When the limit is exceeded,
                // display how many characters should be removed.
                if ( isLimitExceeded ) {
                    charactersBox.textContent = `-${ stats.characters - maxCharacters }`;
                } else {
                    charactersBox.textContent = stats.characters;
                }

                wordsBox.textContent = `Palabras en el documento: ${ stats.words }`;

                // If the content length is close to the character limit, add a CSS class to warn the user.
                container.classList.toggle( 'content-update__limit-close', isCloseToLimit );

                // If the character limit is exceeded, add a CSS class that makes the content's background red.
                container.classList.toggle( 'content-update__limit-exceeded', isLimitExceeded );

                // If the character limit is exceeded, disable the send button.
                sendButton.toggleAttribute( 'disabled', isLimitExceeded );
            }
        }
    })
    .then( editor => {
        editor.editing.view.change(writer=>{
            writer.setStyle('height', '200px', editor.editing.view.document.getRoot());
        },);
    } )
    .catch( error => {
        console.error( error );
    } );



// Add it to the DOM


// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
