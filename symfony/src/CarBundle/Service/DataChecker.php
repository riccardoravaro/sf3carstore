<?php

namespace CarBundle\Service;

use CarBundle\Entity\Car;

class DataChecker
{
	/** @var boolean  */
	protected $requireImagesToPromoteCar;

	/** @var EntityManager */
	protected $entityManager;


	/**
	 *  DataChecker const ructor.
	 * @param entityManager $entityManager
	 * @param bool $requireImagesToPromoteCar
	 *
	 */

	public function __construct($entityManager, $requireImagesToPromoteCar)
	{
		$this->entityManager = $entityManager;
		$this->requireImagesToPromoteCar = $requireImagesToPromoteCar;
	}

	public function checkCar(Car $car)
	{
		$promote = true;
		if ($this->requireImagesToPromoteCar) {

			$promote = false;
		}

		$car->setPromote($promote);
		$this->entityManager->persist($car);
		$this->entityManager->flush();
		return $promote;
	}
}

