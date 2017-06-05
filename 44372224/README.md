ID:     44372224

Title:  Service to get/set current entity

Link:   https://stackoverflow.com/questions/44372224/service-to-get-set-current-entity

Answer: https://stackoverflow.com/questions/44372224/service-to-get-set-current-entity


Question:

I have a `Project` entity, which has a controller defining many routes:

```
projects/1
projects/1/foo
projects/1/bar
```

I need a service to provide the current project. The use case is that I have dependencies in my base twig templates which need to know the current project. i.e. a dropdown project selector that is outside the context of the template the current controller is serving.

I've tried creating a service getting route info with `$container->get('router.request_context');`, however, that only provides a path. I don't want to have to parse the path string if I don't have to.

What is the most proper approach?
