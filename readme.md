# Designing RESTful APIs

- API design must be deliberate:
  - decide what, how and the best way to expose functionality
  - test and (in)validate assumptions
  - Repeat

Affordance: something that allows you to perform an action or accomplish a goal (doorknob, lightswitch)

Intersection of

- what the API does
- what the API makes easy
- what the user wants to do

## Three approaches to add an API

- bolt-on strategy (adding an API to an existing system, for example OTAQ)
  - can use existing code
  - Problems in application leak to API (bad naming conventions)
- Greenfield strategy (new system)
  - API first / mobile first mindst
  - takes advantage of new tech and architectures
  - Drawbacks: massive effort up front
- Facade strategy
  - Replacing systems piece by piece
  - Keeps legacy systems functional while making underlying architecture better
  - can be difficult to have different approaches / mindsets in same system
  - can be hard to replicate behavior 1:1

## Tips for modeling API

- Don't worry about the tools (post it notes or kanban process)
- Have a consistent process (roles in team etc)
- It doesn't count unless it's written down / document everything

## Planning / design process

1. Identify participants
2. Identify activities
3. Break into steps
4. Create API definitions
5. Validate API


### 1. Identifying participants (person or entity)

- Identify People / entities who will use the API
- who / what is involved in the business process
  - anyone who initiates an action indirectly or directly
  - anyone who waits for an action to occur
- What do we need to know?
  - Who are they (assing names)
  - Are they internal or external?
  - are they active (initiating action) or passive (waiting for an action) participants?
- Be mindful of system boundaries
  - Clearly identify what you are responsible for and what are other / third party components
  
Example: Ordering a cup of coffe in a coffee shop

**Participants:**

- The patron (you)
- The barista
- The cashier
- Probably over the realm of your responsability:
  - The payment processor
  - The other customers

### 2. Identifying activities and breaking them into steps

What are the steps?

- Revision 1 (too abstract, doesn't take interactions of participants into account):
  1. place order
  2. wait for order
  3. receive order

- Revision 2 (clearly names participants, dependencies and order):
  1. **Patron** places an order with the **cashier**
  2. **casheir** passes order to **barista**
  3. **barista** acknowledges order and adds it to quere
  4. **cashier** tells **patron** the bill
  5. **patron** provides payment, which is accepted or rejected
  6. **barista** makes orders and delivers them to **patron**
   

Course example: Ordering a book online

- Choose boundaries (and document them!)
  - don't guesss

- Who are the participants
  - Customer
  - ~~System admin~~
  - ~~developer~~
  - stock clerk
  - customer support
- What are our activites? 
  - Ordering a book
    1. customer searches for book
    2. customer adds book to cart
    3. customer adds / removes more things? -> figure out later
    4. customer checks out
    5. stock clerk retrieves and ships book
    6. customer support contacts customer about the book
  - To put it another way...  
    -> View items  
    -> Add items to cart  
    -> add more items? remove items?  
    -> check out (including payment)  
    -> fulfill and ship order  
    -> view order  
  
**Remember document gaps**

Don't guess, ask product owner to check for gaps, ambiguities and incomplete (or over the boundary) user stories; there might be other teams working on these issues already. Example MR: don't assume you have to create a analysis dashboard if MR already has a process or template for it


