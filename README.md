# composer-assets-installer

This is an alternative to the regular composer-installer. It allows you to distribute your project's assets, for example as a standalone library. 
With **composer-assets-installer** you can put .css or .js files, bitmaps, fonts and other assets to separate directory. 
Here is explanation of how all this works:  https://getcomposer.org/doc/articles/custom-installers.md

If you want to use it, you need to prepare a separate project (for example on github) with all your resources and create a composer configuration for it.
Here is example of **composer.json**:
```
{
  "name": "vendor/package-name",
  "homepage": "https://github.com/vendor/package-name",
  "type": "assets-package",
  "version": "0.1.0",
  "license": "GPL-3.0",
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/sugrob/composer-assets-installer"
    }
  ],
  "require": {
    "sugrob/composer-assets-installer": "dev-master"
  },
  "extra": {
    "installer-paths": {
      "vendor/package-name" : "public/assets"
    }
  },
  "config": {
    "allow-plugins": {
      "sugrob/composer-assets-installer": true
    }
  }
}
```

Now everything is ready to connect the new repository to your project. Only what you need is describe it in target project composer configuratuin. Here is an example of a minimal **composer.json**:
```
{
    "name": "vendor/project-name",
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/vendor/project-name"
        },
        {
          "type": "git",
          "url": "https://github.com/sugrob/composer-assets-installer"
        }
    ],
    "require": {
        "vendor/project-name": "dev-master",
        "sugrob/composer-assets-installer": "dev-master"
    },
    "config": {
        "allow-plugins": {
            "composer/installers": true,
            "sugrob/composer-assets-installer": true
        }
    }
}
```
