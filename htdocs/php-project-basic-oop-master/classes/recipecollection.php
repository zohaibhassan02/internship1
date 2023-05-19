<?php

class RecipeCollection
{
    private $title;
    private $recipes = array();

    public function __construct($title = null)
    {
        $this->setTitle($title);
    }

    public function setTitle($title)
    {
        if (empty($title)) {
            $this->title = null;
        } else {
            $this->title = ucwords($title);
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function addRecipe($recipe)
    {
        $this->recipes[] = $recipe;
    }

    public function getRecipes()
    {
        return $this->recipes;
    }

    public function getRecipeTitles()
    {
        $titles = array();
        foreach ($this->recipes as $recipe) {
            $titles[] = $recipe->getTitle();
        }
        return $titles;
    }
    public function filterByTag($tag)
    {
        $taggedRecipes = array();
        foreach ($this->recipes as $recipe) {
            if (in_array(strtolower($tag), $recipe->getTags())) {
                $taggedRecipes[] = $recipe;
            }
        }
        return $taggedRecipes;
    }

    public function getCombinedIngredients()
    {
        $ingredients = array();
        foreach ($this->recipes as $recipe) {
            foreach ($recipe->getIngredients() as $ing) {
                $item = $ing["item"];
                if (strpos($item, ",")) {
                    $item = strstr($item, ",", true);
                }
                if (in_array($item."s", $ingredients)) {
                    $item.="s";
                } else if (in_array(substr($item, 0, -1), $ingredients)) {
                    $item = substr($item, 0, -1);
                }
                $ingredients[$item][] = array(
                    $ing["amount"],
                    $ing["measure"]
                );
            }
        }
        return $ingredients;
    }

    public function filterById($id)
    {
        return $this->recipes[$id];
    }
}