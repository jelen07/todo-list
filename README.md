# Todo List
> Simple example of REST API application written in PHP using Symfony & API Platform.

## User Story
*As a user, I want to have an ability to see a list of tasks for my day, so that I can do them one by one.*

## Installation

### Prerequisites

#### Environment

- Web server (PHP native or Symfony binary)
- PHP `>= 7.4` with required extensions, see [composer.json](composer.json)
- PostreSQL `^13.2`
- Git
- Composer
- Docker and docker-compose

## Documentation

## Considerations
When creating a new application or a new feature, tons of questions should be answered.
Many things depending on you or your team/company, and the application scope of course.

- What is the purpose of a given project?
    - Am I learning something new (technology, architecture, etc.)?
    - Should it be done in a short time period?
    - Should it move forward technology stack?
- Maintainability questions like:
    - What is the expected project lifetime?
    - Is there any other team member, that could take care of this project instead of me?
- Security
- Performance
- Technology
    - What stack should be used?
        - Is it already defined?
        - Should I use technologies that I'm already familiar with, or I can learn something new?
- Is there any ready-to-use solutions?
    If not acceptable, next is research for ready-to-use libraries that could help develop a given project or feature to not start from on the green field.
        - If not acceptable, you will probably have to write some parts on your own.

Many things have pros and cons like everything else, so it's appropriate to find the best fit for a given project or feature.

## Todo
- [x] Install a lightweight version of Symfony `$ symfony new todo-list`
- [x] Install and configure API Platform
- [x] Create an application model
- [x] Set better error messages while authentication - do not expose info, that some user is registered or not
- [ ] Use UUID instead of autoincrement
- [ ] Update `createdAt` and `updatedAt` via `gedmo/doctrine-extensions`
- [ ] Add fixtures
- [x] Implement basic functionality (REST back-end)
- [ ] Implement front-end (PHP x Vue.js)
- [ ] Write tests (consider using TDD)
- [ ] Use Docker
- [ ] Update README
- [ ] Go out

### Next
List of changes, that should be done, but they're not implemented due to lack of time. 
- Add coding standard checker + fixer
- Add static analysis tool
- Entities mapping and other configuration should not be tied to the entities - replace annotations with XML definition
- Set up CI&CD process via GitHub Actions
- Implement security especially within API
- ...
