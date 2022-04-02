<?php
namespace sugrob\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class AssetsInstaller extends LibraryInstaller
{
	/**
	 * @inheritDoc
	 */
	public function getInstallPath(PackageInterface $package)
	{
		$extra = $package->getExtra();

		if (!isset($extra["installer-paths"][$package->getName()])) {
			throw new \InvalidArgumentException(
				'Unable to install assets-package. Install path must be defined in'
				.'extra.installer-paths."vendor-name/pachage-name" : "path"'
			);
		}

		$targetDir = $package->getTargetDir();
		$path = $extra["installer-paths"][$package->getName()];
		$path = substr($path, -1) == "/" ? substr($path, 0, -1) : $path;

		return $extra["installer-paths"][$package->getName()] . ($targetDir ? '/'.$targetDir : '');
	}

	/**
	 * @inheritDoc
	 */
	public function supports($packageType)
	{
		return 'assets-package' === $packageType;
	}
}