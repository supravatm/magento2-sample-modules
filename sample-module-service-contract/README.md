## Synopsis
 
 *In general, the meaning of **Service contract** is an agreement between the two parties,where one is the service provider and other is the service consumer.A service contract defines all the services that are going to be provided with some pre and post conditions.*  

## What is a service contract? 
A service contract is a set of PHP interfaces that are defined for a module. A service contract includes data interfaces, which preserve data integrity, and service interfaces, which hide business logic details from service requestors such as controllers, web services, and other modules.

If developers define data and service interfaces according to a set of design patterns, the result is a well-defined, durable API that other modules and third-party extensions can implement through Magento models and resource models.

> "Service Contract", [Source Link](https://devdocs.magento.com/guides/v2.3/extension-dev-guide/service-contracts/service-contracts.html#what-is-msc)

### Public interfaces & APIs

A public interface is a set of code that third-party developers can call, implement, or build as a plug-in. Magento guarantees that this code will not change in subsequent releases without a major version change.

> "Public interfaces & APIs", [Source Link](https://devdocs.magento.com/guides/v2.3/extension-dev-guide/api-concepts.html)

### How to test Web API through POST-Men?


<img src="https://github.com/Certification-M2/m2-sample/blob/master/docs/servicecontract-get-by-id.png">
<img src="https://github.com/Certification-M2/m2-sample/blob/master/docs/servicecontract-get-list.png">


## Motivation

This extension demonstrate of Service contracts module with the minimal codes. Where we can push & pull data through the Service classes. 

## Technical feature

This extension demonstrate how to build a module using Magento2's Service Contract design pattern.

**Addtionally**  We can consider as an example of Web-API module

 
## Installation

This module is intended to be installed using manually.

## Tests

Unit tests are found in the [Test/Unit](Test/Unit) directory.

## Contributors

c) 2019 Supravat M

## License

[Open Source License](LICENSE.txt)
