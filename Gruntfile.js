'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        //jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'templates/js/*.js',
        '!templates/js/buddypress-min.js'
      ]
    },
    less: {
      dist: {
        files: {
          'templates/css/buddypress-min.css': [
            'templates/less/buddyless.less'
          ]
        },
        options: {
          compress: true,
          // LESS source map
          // To enable, set sourceMap to true and update sourceMapRootpath based on your install
          sourceMap: true,
          sourceMapFilename: 'templates/css/buddypress-min.css.map',
          sourceMapRootpath: 'wp-content/plugins/bp-legacy-less/'
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'templates/js/buddypress-min.js': [
            'templates/js/bp-custom.js',
            'templates/js/plugins/*.js',
            '!templates/js/buddypress.js',
            '!templates/js/buddypress-min.js'
          ]
        },
        options: {
          //JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
          // sourceMap: 'templates/js/scripts.min.js.map',
          // sourceMappingURL: '/app/themes/roots/templates/js/scripts.min.js.map'
        }
      }
    },
    version: {
      options: {
        file: 'inc/bp-scripts.php',
        css: 'templates/css/buddypress-min.css',
        cssHandle: 'bp_styles',
        js: 'templates/js/buddypress-min.js',
        jsHandle: 'bp_scripts'
      }
    },
    watch: {
      less: {
        files: [
          'templates/less/*.less'
        ],
        tasks: ['less']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['uglify']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: false
        },
        files: [
          'templates/css/buddypress-min.css',
          'templates/js/buddypress-min.js',
          'templates/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
          'templates/css/buddypress-min.css',
          'templates/js/buddypress-min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  //grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-wp-version');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'less',
    'uglify',
    'version'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
