<?php

namespace App\Command;

use App\Service\Useless;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

class ExampleCommand extends Command
{
    protected static $defaultName = 'app:example';

    private $useless;

    public function __construct(Useless $useless)  //appel aux services que l'on veut forcément dans le constructeur
    {
        parent::__construct(); //bonne pratique : appeler le parent en premier : c'est nécéssaire !

        $this->useless = $useless;
    }

    protected function configure()
    {
        $this
            ->setDescription('Commande perso qui fait ce que je lui dit de faire')
            ->setHelp('ceci est une aide <info> pour vous aider</info>')
            ->addArgument('name', InputArgument::OPTIONAL, 'Donner un Nom')
            ->addArgument('prenom', InputArgument::OPTIONAL, 'Donner un Prenom')
            ->addOption('show_prenom', null, InputOption::VALUE_NONE, 'comme le port salut')
            ->addOption('color', null, InputOption::VALUE_REQUIRED, 'si red on affiche du rouge')
            ->addOption('uppercase', 'u', InputOption::VALUE_NONE, 'Capitalize')
        ;
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        $helper = new SymfonyStyle($input, $output);
        $name = $input->getArgument('name');
        $prenom = $input->getArgument('prenom');

        if(!$name){
            $question = new  Question( 'Quel est ton nom ?');
            $name = $helper->askQuestion($question);

            $input->setArgument('name', $name);
        }

        if(!$prenom){
            $question2 = new  Question( 'Quel est ton prénom ?');
            $prenom = $helper->askQuestion($question2);

            $input->setArgument('prenom', $prenom);
        }
    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $name = $input->getArgument('name');
        $firstname = $input->getArgument('prenom');

        if ($input->getOption('uppercase')) {
            $name = strtoupper($name);
            $firstname = strtoupper($firstname);
        }

        if ($name) {
            $msg  = 'Bonjour Mr :' . $name;
            if ($input->getOption('show_prenom')) {
                    $msg .= ' ' . $firstname;
            }
            $io->note($msg);
        }


        if ($input->getOption('color') == 'red') {
            $io->error('ROUGE');
        }
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        $io->note($this->useless->nothing('rien de rien'));

        if($io->confirm('Tu me donne ton pwd ? ',false)){
            $pwd = $io->askHidden('Passwd : ');
            if( 'toto' === $pwd ){
                $choice = $io->choice('choisis un cadeau', ['Or', 'Argent', 'Bronze'], 'Bronze');
                $io->newLine(3);
                $io->success($choice);
            }
            $io->warning( 'ton pwd est ' .$pwd);
        }

        $films = ['Thor', 'ironman', 'Starwars', 'Papillon', 'batman', 'escaperoom'];
        $io->title('Liste de films');
        $io->listing($films);

        $question = new Question('Film préféré ?');
        $question->setAutocompleterValues($films);
        $res = $io->askQuestion($question);

        if($res == 'Thor'){
            $io->success('moi aussi');
        }

        return 0;
    }
}
