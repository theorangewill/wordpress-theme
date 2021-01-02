# Wordpress theme

This a Wordpress theme that I made to learn web development. I learned HTML, CSS, php and Wordpress, and discovered tools like npm, gulp, sass, Wordpress plugins and others.

This template have a blog style with a lesson topology.

The home page has a simple menu and a category menu with huge images.
The posts is a catalog using [Masonry tool](https://masonry.desandro.com/).

![home page](/img/homepage.png)

The category menu is customized in the Wordpress menu Theme Custom > Categories Menu.
![category menu](/img/menuoptions.png)

## Categories and lessons

The theme as the classic post type and a custom type called lessons.
The classic post have two taxonomies: category and tag. While the lessons has: subject and tag.

A category have children categories.
Below there is the page for the categories without parent. This page has a title and description of the category, followed by a catalog of children categories, that have images. 
![parent category page](/img/categorypage.png)

The children have the template below. This page shows the posts with this category. In the header, there is parent category (canto superior esquerdo) and embaixo the children categories. In the example, the page is for the IA category, which is a child of Computing and has Neural Network as child.
![children category page](/img/categorychildrenpage.png)

Lessons has the same templates.

## Posts

The post have the template below. It has a title, description, the text and a footer. As the end of the the text, 
![post page](/img/postpage.png)

The footer have references, list of tags, the publish and update dates, and the author. The author has a popover that shows a description.
![post footer](/img/postfooter.png)

It is possible to create a table of contents.
![post table content](/img/tablecontents.png)

The table is created using commands in the text:
![post table content commands](/img/tablecontentscommands.png)
![post table content options](/img/tablecontentsoptions.png)

Another commmand is the popover tip.
![post text tip](/img/texttip.png)
![post text tip](/img/texttipcommand.png)

This is the template for the comments.
![post comments](/img/comments.png)

### Page

Page is another default post type from Wordpress and has a simple template:
![page](/img/page.png)



## Search 

The search page is similar to the others.
![search page](/img/searchpage.png)

## Author

Each author has a page with information about they. The page has an avatar, a description, an email image and links to the social media. The user can add Interests and Experiences. Also it is showed a list of tags and posts that the author wrote. 
![author page](/img/authorpage.png)

The admin can change the name and the box information in the Wordpress menu Theme Options > Options.
![author box info](/img/authorboxinfo.png)
![author box info options](/img/authorboxinfooptions.png)

The author can add and remove the interests and experiences in the Wordpress menu Author Fields > All Author Fields. These fields are made using the [Advanced Custom Fields](https://www.advancedcustomfields.com/) plugin.
![author fields](/img/authorfields.png)

The description is shown as:
![author interests](/img/authorinterests.png)
![author experiences ](/img/authorexperiences.png)

## Customize

The admin can also use the Customize from Wordpress to alter colors and header and footer logo. 
![customize](/img/customize.png)

