module.exports = function(grunt) {
    
    grunt.initConfig({
        less: {
            dev: {
                src: ['css/*.less'],
                dest: 'css/main.css',
            },
        },
        watch: {
            less: {
                files: '**/*.less',
                tasks: ['less'],
            },
            livereload: {            
                options: {
                    livereload: true
                },
                files: ['css/*'],
            },
        },    
    });
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
};