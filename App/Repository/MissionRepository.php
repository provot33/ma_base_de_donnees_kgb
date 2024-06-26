<?php

namespace App\Repository;

use App\Entity\Mission;
use App\Entity\MissionStatus;
use App\Entity\MissionType;
use App\Entity\Nationality;
use App\Entity\Speciality;
use DateTime;

class MissionRepository extends Repository
{
    private function affecteMission($mission): Mission {
        if ($mission) {              
            $kgbAgentRepository = new KgbAgentRepository();
            $kgbAgentsArray = $kgbAgentRepository->findAllByMissionId($mission['id_mission']);
            $targetRepository = new TargetRepository();
            $targetsArray = $targetRepository->findAllByMissionId($mission['id_mission']);
            $contactRepository = new ContactRepository();
            $contactsArray = $contactRepository->findAllByMissionId($mission['id_mission']);
            $hideoutRepository = new HideoutRepository();
            $hideoutsArray = $hideoutRepository->findAllByMissionId($mission['id_mission']);
            $missionToAdd = new Mission($mission['id_mission'],$mission['title'], $mission['description'], 
                $mission['codeName'], new DateTime($mission['startDate']), new DateTime($mission['finishDate']),
                new Speciality($mission['id_speciality'], $mission['labelOfSpeciality']),
                new Nationality($mission['id_nationality'], $mission['country']));
            $missionType = new MissionType($mission['id_type'], $mission['typeName']);
            $missionStatus = new MissionStatus($mission['id_status'], $mission['statusName']);
            $missionToAdd->setMissionType($missionType);
            $missionToAdd->setMissionStatus($missionStatus);
            $missionToAdd->setKgbAgents($kgbAgentsArray);
            $missionToAdd->setTargets($targetsArray);
            $missionToAdd->setContacts($contactsArray);
            $missionToAdd->setHideouts($hideoutsArray);
            $mission = $missionToAdd;
        }

        return $mission;
    }

    public function getAll(): array
    {
        $query = $this->pdo->prepare(
            "SELECT * FROM mission m
                JOIN speciality s ON s.id_speciality = m.id_speciality
                JOIN nationality n ON n.id_nationality = m.id_nationality
                JOIN missionType mt ON mt.id_type = m.id_type
                JOIN missionStatus ms ON ms.id_status = m.id_status");
        $query->execute();
        $missions = $query->fetchAll($this->pdo::FETCH_ASSOC);

        $missionsArray = [];

        if ($missions) {              
            foreach ($missions as $mission) {
                $missionsArray[] = $this->affecteMission($mission);
            }
        }

        return $missionsArray;
    }

    public function getMission($idMission): Mission
    {
        $query = $this->pdo->prepare(
            "SELECT * FROM mission m
                JOIN speciality s ON s.id_speciality = m.id_speciality
                JOIN nationality n ON n.id_nationality = m.id_nationality
                JOIN missionType mt ON mt.id_type = m.id_type
                JOIN missionStatus ms ON ms.id_status = m.id_status
                WHERE id_mission = :id_mission");
        $query->bindParam(':id_mission', $idMission, $this->pdo::PARAM_STR);
        $query->execute();
        $mission = $query->fetch($this->pdo::FETCH_ASSOC);

        return $this->affecteMission($mission);
    }
}
