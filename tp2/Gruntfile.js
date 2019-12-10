module.exports = function(grunt){
    
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        
        concat:{
            options:{
                separator: ';'
            },
            dist:{
                src: ['js/*.js','tests/*.js'],
                dest: 'dist/<%= pkg.name %>.js'
            }
        },

        copy:{
            main: {
                files: [
                    {expand: true,flatten:true, src:['html/*'], dest:'dist/',filter: 'isFile'}
                ],
            },
        },
        
        uglify:{
            options: {
                // the banner is inserted at the top of the output
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
            },
            dist: {
                files: {
                    'dist/<%= pkg.name %>.min.js': ['<%= concat.dist.dest %>']
                }
            }
        },

        qunit: {
            files: ['dist/*.html'],
            options:{
                puppeteer: {
                    executablePath: "/usr/bin/firefox"
                }
            }
        },

        jshint: {
            files: ['Gruntfile.js', 'js/*.js','tests/*.js'],
            options: {
                globals: {
                    jQuery: true,
                    console: true,
                    module: true,
                    document: true
                }
            }
        },

        watch: {
            

            javascript:{
                files: ['<%= jshint.files %>'],
                tasks: ['jshint', 'concat', 'uglify'],
                options:{
                    livereload : true,
                },
            },

            html:{
                files: ['html/*.html'],
                tasks: ['copy'],
                options:{
                    livereload : true,
                },
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-qunit');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
  

    grunt.registerTask('test', ['jshint', 'qunit']);

    grunt.registerTask('default', ['jshint', 'concat','copy','uglify']);
};