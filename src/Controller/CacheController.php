<?php

namespace App\Controller;

use Michelf\MarkdownInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class CacheController extends AbstractController
{

    private const KEYPSR6 = 'cacheAdapterPsr6';
    private const KEYCONCTRACTS = "cacheAdapterContract";
    /**
     * @Route("/cache", name="cache_index")
     */
    public function index(MarkdownInterface $md, AdapterInterface $cache)
    {
        $content =<<<EOF
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
EOF;


       $item = $cache->getItem(self::KEYPSR6.'-'.md5($content));  //$item prend la clé meme s'il n'est pas HIT (i.e. il n'y a rien dans le cache
        if( !$item->isHit() ){
            $item->set($md->transform($content));
            $item->expiresAfter(60);
            $cache->save($item);
        }
        dump($item);
        $html = $item->get();
//*/
      //  $html = $md->transform($content);

        return $this->render('cache/index.html.twig', [
            'html' => $html
        ]);
    }

    /**
     * @route("/cache/contracts", name="cache_contracts")
     */
    public function contracts(MarkdownInterface $md, CacheInterface $cache)
    {
        $content =<<<EOF
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
## Rédiger du contenu en MarkDown et le mettre en cache
### 1- Rédiger du markdown
**Lorem ipsum dolor sit amet**, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.

_Lorem ipsum dolor sit amet_, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 2- mettre en cache
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Aliquid eum inventore maxime necessitatibus, provident reprehenderit sed.
Dicta eum id ipsum itaque maxime, nam nisi quidem repellendus reprehenderit, sapiente ullam veniam.
___
### 3- Faire du HTML
* un élément a
* un élément b
* un élément c
* un élément d
EOF;
        //deuxieme param de $cache->() est un callable
        $html = $cache->get(self::KEYCONCTRACTS.'-'.md5($content),function(ItemInterface $item) use ($md,$content) {
            $item->expiresAfter(60);
            return $md->transform($content);
        });
        //  $html = $md->transform($content);

        return $this->render('cache/index.html.twig', [
            'html' => $html
        ]);
    }
}
