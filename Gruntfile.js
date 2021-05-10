module.exports = function(grunt) {

	const sass = require('node-sass');

	// Config
	grunt.initConfig({

		sass: {
      options: {
        implementation: sass
      },
      dist: {
        files: {
          'src/css/plugins.css': 'src/scss/plugins/plugins.scss',
          'src/css/structure.css': 'src/scss/structure/structure.scss',
          'src/css/components.css': 'src/scss/components/components.scss',
          'src/css/content.css': 'src/scss/content/content.scss',
        }
      }
    },
    concat: {
			js: {
				src: ['src/js/plugins/*.js',
							'src/js/structure/*.js',
							'src/js/components/*.js',
							'src/js/content/*.js'
						],
				dest: 'dist/js/ait.min.js'
			},
			css: {
				src: ['src/css/plugins.css',
							'src/css/structure.css',
							'src/css/components.css',
							'src/css/content.css'
						],
				dest: 'dist/css/ait.min.css'
			}
		},

    uglify: {
	    my_target: {
	      files: {
	      	// lib
	        'dist/js/ait.min.js': ['dist/js/ait.min.js']
	      }
	    }
	  },

	  cssmin: {
		  options: {
		    mergeIntoShorthands: false,
		    roundingPrecision: -1
		  },
		  target: {
		    files: {
		    	// lib
		      'dist/css/ait.min.css': ['dist/css/ait.min.css']
		    }
		  }
		},

		connect: {
			sever: {
				options: {
					hostname: 'localhost',
					port: 3000,
					livereload: true
				}
			}
		},

		watch: {
			options: {
				livereload: true,
				dateFormat: function(time) {
					grunt.log.writeln('The watch finished in ' + time + 'ms at' + (new Date()).toString());
					grunt.log.writeln('Waiting for more changes...');
				}
			},
			sass: {
	      files: ['src/**/*.scss'],
	      tasks: ['sass', 'concat:css', 'cssmin']
	    },
	    scripts: {
	      files: ['src/**/*.js'],
	      tasks: ['concat:js', 'uglify']
	    },
	    html: {
        files: ['**/*.html']
    	}
		}

	});

	// Load plugins
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-connect');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// Register tasks
	grunt.registerTask('default', ['connect', 'watch']);

};