<?php

use App\Models\Category;
use App\Models\WebsiteConfig;
use Illuminate\Database\Eloquent\Collection;

function parseMultiCategories($categories){
  $collections =  new Collection();
  $level = 0;
  foreach($categories as $category){
    $category->level = $level;
    $collections->add($category);
    foreach ($category->childrenCategories as $childCategory) {
      dequyCategory($collections, $childCategory, $level);
    }
  }
  return $collections;
}

function dequyCategory(&$collections, $category, $level){
  $category->level = ++$level;
  $collections->add($category);
  foreach ($category->childrenCategories as $childCategory) {
    dequyCategory($collections, $childCategory, $level);
  }
}

// recommend cách 2 này
function arrangeCategories($categories, $level = 0){
  $collections = new Collection();
  foreach ($categories as $category) {
    $category->level = $level;
    $collections->add($category);
    recursiveCategories($category->childrenCategories, $collections, $level);
 }
 return $collections;
}

function recursiveCategories($categories, $collections, $level){
  $level++;
  foreach ($categories as $category) {
    $category->level = $level;
    $collections->add($category);
    recursiveCategories($category->childrenCategories, $collections, $level);
  } 
}

function arrangeBreadCrumb($category){
  $collections = new Collection();
  if ($category) {
    $collections->add($category);
    if ($category->parentsCategory) {
      recursiveBreadCrumb($category->parentsCategory, $collections);
    }
  }
  return $collections->reverse();
}

function recursiveBreadCrumb($category, $collections){
  $collections->add($category);
  if ($category->parentsCategory) {
    recursiveBreadCrumb($category->parentsCategory, $collections);
  }
}

function getWebsiteConfig($config_name){
  $config = WebsiteConfig::where('config_name', $config_name)->first();
  if (!$config) {
    return null;
  }
  else
  return $config->config_value;
  
}