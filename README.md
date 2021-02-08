# Buto-Plugin-WfArraysearch
Search in array.
## Usage 
Get all keys or get all keys by name and/or by value.
```
wfPlugin::includeonce('wf/arraysearch');
$search = new PluginWfArraysearch(true);
$search->data = array('key_name' => 'three', 'key_value' => '3', 'data' => array('one' => '1', 'two' => array('three' => 3, 'four' => '4'), 'three' => 33));
wfHelp::yml_dump($search->get());    
Return array: - /two/three
```
