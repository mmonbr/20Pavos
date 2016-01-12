/*******************************
     Admin Task Collection
*******************************/

/*
  This are tasks to be run by project maintainers
  - Creating Component Repos
  - Syncing with GitHub via APIs
  - Modifying package files
*/

/*******************************
             Tasks
*******************************/


module.exports = function(gulp) {
  var
    // less/css distributions
    initComponents      = require('../AdminLTE/components/init'),
    createComponents    = require('../AdminLTE/components/create'),
    updateComponents    = require('../AdminLTE/components/update'),

    // single component releases
    initDistributions   = require('../AdminLTE/distributions/init'),
    createDistributions = require('../AdminLTE/distributions/create'),
    updateDistributions = require('../AdminLTE/distributions/update'),

    release             = require('../AdminLTE/release'),
    publish             = require('../AdminLTE/publish'),
    register            = require('../AdminLTE/register')
  ;

  /* Release */
  gulp.task('init distributions', 'Grabs each component from GitHub', initDistributions);
  gulp.task('create distributions', 'Updates files in each repo', createDistributions);
  gulp.task('init components', 'Grabs each component from GitHub', initComponents);
  gulp.task('create components', 'Updates files in each repo', createComponents);

  /* Publish */
  gulp.task('update distributions', 'Commits component updates from create to GitHub', updateDistributions);
  gulp.task('update components', 'Commits component updates from create to GitHub', updateComponents);

  /* Tasks */
  gulp.task('release', 'Stages changes in GitHub repos for all distributions', release);
  gulp.task('publish', 'Publishes all releases (components, package)', publish);
  gulp.task('register', 'Registers all packages with NPM', register);

};