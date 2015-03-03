module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        watch: {
            js: {
                files: ['src/**/*.js'],
                tasks: ['concat']
            },
            livereload: {
                files: ['src/**/*.js'],
                options: { livereload: true }
            }
        },

        jshint: {
            all: [
                'src/**/*.js'
            ],
            options: {
                jshintrc: '.jshintrc'
            }
        },

        concat: {   
            scripts: {
                src: [
                    'src/**/*.js'
                ],
                dest: 'public/js/benson-public.js',
            }
        },

        ngAnnotate: {
            scripts: {
                src: 'public/js/benson-public.js',
                dest: 'public/js/benson-public.js'
            }
        },

        uglify: {
            scripts: {
                src: 'public/js/benson-public.js',
                dest: 'public/js/benson-public.js'
            }
        },

    });

    // 3. Where we tell Grunt we plan to use this plug-in.

    // JS
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-ng-annotate');
   
    // Browser Reload + File Watch
    grunt.loadNpmTasks('grunt-contrib-watch');


    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.


    // Run our devleoppment environment
    grunt.registerTask('dev', ['watch']);

    // cleans directories, does everything for css, js, and images for deploy
    grunt.registerTask('build', ['concat', 'ngAnnotate', 'uglify']);


};