// For God so loved the world, that He gave His only begotten Son, that all who belive in Him should not perish but have everlasting life

/**
 * BLOCK: oo1b-aleluya
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './style.scss';
import './editor.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'cgb/block-oo-donation-aleluya', {
  // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
  title: __( 'Open Orphanage Donation Block ✝' ), // Block title.
  icon: 'heart', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
  category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
  keywords: [
    __( 'Open Orphanage' ),
    __( 'Orphanage' ),
    __( 'Aleluya' ),
    __( 'Donation' ),
    __( 'Sponsor' ),
  ],
  attributes: {
  'purpose_aleluya': {type: 'string', source: "meta", meta: 'purpose_aleluya'}

  },

  /**
   * The edit function describes the structure of your block in the context of the editor.
   * This represents what the editor will render when the block is used.
   *
   * The "edit" property must be a valid function.
   *
   * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
   */
  edit: function( props ) {
    // Creates a <p class='wp-block-cgb-block-oo1b-aleluya'></p>.
    return (
      <div className={ props.className }>
        <p> — Hallelujah!!! Jesus Christ is Lord - .</p>
        Here we will place a Stripe donation field. It will work with people who are not registered.
      </div>
    );
  },

  /**
   * The save function defines the way in which the different attributes should be combined
   * into the final markup, which is then serialized by Gutenberg into post_content.
   *
   * The "save" property must be specified and must be a valid function.
   *
   * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
   */
  save: function( props ) {
    return (
      <div class="oo_donation_block_aleluya"> 
        [oo_donation_block_aleluya/]        
      </div>
    );
  },
} );
