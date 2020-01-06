'use strict'

module.exports = (grunt) ->

  require('time-grunt')(grunt)
  require('jit-grunt')(grunt)
  require('load-grunt-tasks')(grunt)

  grunt.initConfig
    pkg: grunt.file.readJSON('package.json')

    clean:
      release: [
        'package.json'
        '.DS_STORE'
        'bower.json'
        '.bowerrc'
        'bower_components'
        '.gitignore'
        '.gitmodules'
        '.gitattributes'
        'scss'
        '*.scss'
        '*.sass'
        '*.map'
        '.sass-cache'
        'csscomb.json'
        'Gruntfile.js'
        'node_modules'
      ]

    compress:
      release:
        options:
          archive: '../<%= pkg.name %>_<%= pkg.version %>.zip'
          mode: 'zip'
          level: 9

        files: [{
          expand: true,
          src: [
            '**'
            '!**/.git/**'
            '!**/.gitignore'
            '!**/.gitmodules'
            '!**/.git'
            '!**/.DS_STORE/**'
            '!**/*.zip'
            '!**/src/**'
            '!**/grunt/**'
            '!.sass-cache'
            '!csscomb.json'
            '!**/*.map'
            '!**/.bowerrc'
            '!**/bower.json'
            '!**/node_modules/**'
            '!**/package.json'
            '!**/package-lock.json'
            '!**/Gruntfile.js'
            '!**/Gruntfile.coffee'
            '!**/yarn*'
          ]
          dest: '<%= pkg.name %>_<%= pkg.version %>'
        }]

    shell:
      npm:
        command: 'npm install'

    sass:
      options:
        precision: 6

      dev:
        options:
          sourcemap: 'auto'
          style: 'expanded'
        files:
          'assets/css/styles.css': 'assets/src/scss/styles.scss'

      dist:
        options:
          sourcemap: false
          style: 'compressed'

        files:
          'assets/css/styles.css': 'assets/src/scss/styles.scss'

    csscomb:
      dist:
        options:
          config: 'grunt/csscomb.json'

        files:
          'assets/css/styles.css': ['assets/css/styles.css']

    postcss:
      dev:
        options:
          map: true,
          processors: [
            require('autoprefixer')({
              overrideBrowserslist: ['last 2 versions']
            })
          ]

        src: 'assets/css/styles.css'

      dist:
        options:
          map: false,
          processors: [
            require('autoprefixer')({
              overrideBrowserslist: ['last 6 versions']
            })
          ]

        src: 'assets/css/styles.css'

    babel:
      options:
        presets: ['@babel/preset-env']

      dev:
        options:
          sourceMap: true
          compact: false

        files:
          'assets/js/app.js': 'assets/src/js/app.js'

      dist:
        options:
          sourceMap: false
          compact: true

        files:
          'assets/js/app.js': 'assets/src/js/app.js'

    coffeelint:
      dev:
        options:
          configFile: 'grunt/coffeelint.json'
        files:
          src: [
            '**/*.coffee'
            '!**/node_modules/**'
          ]

    notify:
      options:
        title: 'Grunt'

      init:
        options:
          message: 'Grunt has been initiated.'

      release:
        options:
          message: 'Grunt has cleaned up your theme for release.'

      grunt:
        options:
          message: 'Grunt has been updated.'

      sass:
        options:
          message: 'Sass files has been compiled.'

      babel:
        options:
          message: 'Javascript files has been compiled.'

    wakeup:
      complete:
        options:
          custom: 'grunt/pop.mp3'
          output: false

    watch:
      options:
        livereload: 10001
        dateFormat: (time) ->
          grunt.log.writeln('Grunt has finished in ' + time + 'ms!')
          grunt.log.writeln('Waiting...')
        event: ['all']
        interrupt: true

      configFiles:
        options:
          reload: true
        files: 'Gruntfile.coffee'
        tasks: [
          'coffeelint'
          'notify:grunt'
          'wakeup:complete'
        ]

      npm:
        files: ['package.json']
        task: [
          'shell:npm'
          'wakeup:complete'
        ]

      sass:
        files: ['assets/src/scss/**/*.{scss,sass}']
        tasks: [
          'sass-build'
          'wakeup:complete'
        ]

      js:
        files: ['assets/src/js/**/*.js']
        tasks: [
          'babel-build'
          'wakeup:complete'
        ]

  # Sass Tasks
  grunt.registerTask 'sass-build', [
    'sass:dev'
    'postcss:dev'
    'notify:sass'
  ]
  grunt.registerTask 'sass-dev', [
    'sass-build'
    'notify:init'
    'wakeup:complete'
    'watch:sass'
  ]
  grunt.registerTask 'sass-dist', [
    'sass:dist'
    'csscomb:dist'
    'postcss:dist'
    'notify:release'
    'compress:release'
  ]

  # babel tasks
  grunt.registerTask 'babel-build', [
    'babel:dev'
    'notify:babel'
  ]
  grunt.registerTask 'babel-dev', [
    'babel-build'
    'notify:init'
    'wakeup:complete'
    'watch:babel'
  ]
  grunt.registerTask 'babel-dist', [
    'babel:dist'
    'notify:release'
    'compress:release'
  ]

  # Default Task
  grunt.registerTask 'default', [
    'notify:init'
    'wakeup:complete'
    'watch'
  ]

  # zip build
  grunt.registerTask 'zip', [
    'sass:dist'
    'csscomb:dist'
    'postcss:dist'
    'babel:dist'
    'notify:release'
    'compress:release'
  ]
