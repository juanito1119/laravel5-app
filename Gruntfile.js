module.exports = function(grunt) {

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-connect');
  grunt.loadNpmTasks('grunt-contrib-less');

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      src: {
        files: [
          'app/**/**/**/*',
          'resources/**/**/*'
        ],
        options: { livereload: true }
      },
      less: {
        files: ["public/less/**/**/**/**/*"],
        tasks: ["less"],
        options: { livereload: true }
      },
      js:{
        files:['public/js/**/**/**/**/**/*'],
        options: { livereload: true }
      }
    },
    connect: {
      server: {
        options: {
          port: 8080,
          base:'public'
        }
      }
    },
    less: {
      development: {
        options: {
          compress: true,
          yuicompress: false,
          optimization: 2,
          cleancss:false,
          paths: ["css"],
          syncImport: false,
          strictUnits:false,
          strictMath: true,
          strictImports: true,
          ieCompat: false
        },
        files: {
          "public/css/app.css": "public/less/app.less"
        }
      }
    }
  });


  grunt.registerTask('default',[
    'connect:server',
    'watch'
  ]);

};
