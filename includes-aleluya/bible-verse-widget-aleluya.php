<?php
// For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish
// but have everlasting life
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

/**
 * Display a Bible Verse
 **/



// Register and load the widget
function oo_load_widget_aleluya() {
    register_widget( 'OO_Bible_widget_aleluya' );
}
add_action( 'widgets_init', 'oo_load_widget_aleluya' );
 
// Creating the widget 
class OO_Bible_widget_aleluya extends WP_Widget {

 
  function __construct() {
    parent::__construct(
     
    // Base ID of your widget
    'oo_bible_widget', 
     
    // Widget name will appear in UI
    __('Open Orphanage Bible Verse Widget', 'open-orphanage'), 
     
    // Widget description
    array( 
      'description' => __( 'Bible Verse', 'open-orphanage' ), 
    ));
  }
 
// Creating widget front-end
 
  public function widget( $args_aleluya, $instance_aleluya ) {
    $title_aleluya = apply_filters( 'widget_title', $instance_aleluya['title_aleluya'] );
     
    // before and after widget arguments are defined by themes
    echo $args_aleluya['before_widget'];
    if ( ! empty( $title_aleluya ) )
    echo $args_aleluya['before_title'] . $title_aleluya . $args_aleluya['after_title'];
     
    // This is where you run the code and display the output
    $verses_ar_aleluya = explode("\n", $this->verses_aleluya);
    $verse_aleluya = $verses_ar_aleluya[ rand(0,count($verses_ar_aleluya)-1)]; 
    echo $verse_aleluya;
    //echo __( 'Hello, World!', 'open-orphanage' );
    echo $args_aleluya['after_widget'];
  }
         
  // Widget Backend 
  public function form( $instance_aleluya ) {
    if ( isset( $instance_aleluya[ 'title_aleluya' ] ) ) {
      $title_aleluya = $instance_aleluya[ 'title_aleluya' ];
    }
    else {
      $title_aleluya = __( 'New title', 'open-orphanage' );
    }
    // Widget admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title_aleluya' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title_aleluya' ); ?>" name="<?php echo $this->get_field_name( 'title_aleluya' ); ?>" type="text" value="<?php echo esc_attr( $title_aleluya ); ?>" />
    </p>
    <?php 
  }
     
// Updating widget replacing old instances with new
  public function update( $new_instance_aleluya, $old_instance_aleluya ) {
    $instance_aleluya = array();
    $instance_aleluya['title_aleluya'] = ( ! empty( $new_instance_aleluya['title_aleluya'] ) ) ? strip_tags( $new_instance_aleluya['title_aleluya'] ) : '';
    return $instance_aleluya;
  }



  private $verses_aleluya = <<<VERSES_ALELUYA
John 3:16: For God so loved the world, that he gave his only begotten Son, that whosoever believeth in him should not perish, but have everlasting life.
Jeremiah 29:11: For I know the thoughts that I think toward you, saith the LORD, thoughts of peace, and not of evil, to give you an expected end.
Romans 8:28: And we know that all things work together for good to them that love God, to them who are the called according to his purpose.
Philippians 4:13: I can do all things through Christ which strengtheneth me.
Genesis 1:1: In the beginning God created the heaven and the earth.
Proverbs 3:5: Trust in the LORD with all thine heart; and lean not unto thine own understanding.
Proverbs 3:6: In all thy ways acknowledge him, and he shall direct thy paths.
Romans 12:2: And be not conformed to this world: but be ye transformed by the renewing of your mind, that ye may prove what is that good, and acceptable, and perfect, will of God.
Philippians 4:6: Be careful for nothing; but in every thing by prayer and supplication with thanksgiving let your requests be made known unto God.
Matthew 28:19: Go ye therefore, and teach all nations, baptizing them in the name of the Father, and of the Son, and of the Holy Ghost:
Ephesians 2:8: For by grace are ye saved through faith; and that not of yourselves: it is the gift of God:Galatians 5:22: But the fruit of the Spirit is love, joy, peace, longsuffering, gentleness, goodness, faith,
Romans 12:1: I beseech you therefore, brethren, by the mercies of God, that ye present your bodies a living sacrifice, holy, acceptable unto God, which is your reasonable service.
John 10:10: The thief cometh not, but for to steal, and to kill, and to destroy: I am come that they might have life, and that they might have it more abundantly.
Acts 18:10: For I am with thee, and no man shall set on thee to hurt thee: for I have much people in this city.
Acts 18:9: Then spake the Lord to Paul in the night by a vision, Be not afraid, but speak, and hold not thy peace:
Acts 18:11: And he continued there a year and six months, teaching the word of God among them.
Galatians 2:20: I am crucified with Christ: nevertheless I live; yet not I, but Christ liveth in me: and the life which I now live in the flesh I live by the faith of the Son of God, who loved me, and gave himself for me.
I John 1:9: If we confess our sins, he is faithful and just to forgive us our sins, and to cleanse us from all unrighteousness.
Romans 3:23: For all have sinned, and come short of the glory of God;
John 14:6: Jesus saith unto him, I am the way, the truth, and the life: no man cometh unto the Father, but by me.
Matthew 28:20: Teaching them to observe all things whatsoever I have commanded you: and, lo, I am with you alway, even unto the end of the world. Amen.
Romans 5:8: But God commendeth his love toward us, in that, while we were yet sinners, Christ died for us.
Philippians 4:8: Finally, brethren, whatsoever things are true, whatsoever things are honest, whatsoever things are just, whatsoever things are pure, whatsoever things are lovely, whatsoever things are of good report; if there be any virtue, and if there be any praise, think on these things.
Philippians 4:7: And the peace of God, which passeth all understanding, shall keep your hearts and minds through Christ Jesus.
Joshua 1:9: Have not I commanded thee? Be strong and of a good courage; be not afraid, neither be thou dismayed: for the LORD thy God is with thee whithersoever thou goest.
Isaiah 40:31: But they that wait upon the LORD shall renew their strength; they shall mount up with wings as eagles; they shall run, and not be weary; and they shall walk, and not faint. 
Ephesians 2:9: Not of works, lest any man should boast.
Romans 6:23: For the wages of sin is death; but the gift of God is eternal life through Jesus Christ our Lord.
Galatians 5:23: Meekness, temperance: against such there is no law.
Isaiah 53:5: But he was wounded for our transgressions, he was bruised for our iniquities: the chastisement of our peace was upon him; and with his stripes we are healed.
I Peter 3:15: But sanctify the Lord God in your hearts: and be ready always to give an answer to every man that asketh you a reason of the hope that is in you with meekness and fear:
II Timothy 3:16: All scripture is given by inspiration of God, and is profitable for doctrine, for reproof, for correction, for instruction in righteousness:
Matthew 6:33: But seek ye first the kingdom of God, and his righteousness; and all these things shall be added unto you.
Hebrews 12:2: Looking unto Jesus the author and finisher of our faith; who for the joy that was set before him endured the cross, despising the shame, and is set down at the right hand of the throne of God.
I Peter 5:7: Casting all your care upon him; for he careth for you.
Ephesians 2:10: For we are his workmanship, created in Christ Jesus unto good works, which God hath before ordained that we should walk in them.
I Corinthians 10:13: There hath no temptation taken you but such as is common to man: but God is faithful, who will not suffer you to be tempted above that ye are able; but will with the temptation also make a way to escape, that ye may be able to bear it.
Matthew 11:28: Come unto me, all ye that labour and are heavy laden, and I will give you rest.
Hebrews 11:1: Now faith is the substance of things hoped for, the evidence of things not seen.
II Corinthians 5:17: Therefore if any man be in Christ, he is a new creature: old things are passed away; behold, all things are become new.
Hebrews 13:5: Let your conversation be without covetousness; and be content with such things as ye have: for he hath said, I will never leave thee, nor forsake thee.
II Corinthians 12:9: And he said unto me, My grace is sufficient for thee: for my strength is made perfect in weakness. Most gladly therefore will I rather glory in my infirmities, that the power of Christ may rest upon me.
Romans 10:9: That if thou shalt confess with thy mouth the Lord Jesus, and shalt believe in thine heart that God hath raised him from the dead, thou shalt be saved.
Isaiah 41:10: Fear thou not; for I am with thee: be not dismayed; for I am thy God: I will strengthen thee; yea, I will help thee; yea, I will uphold thee with the right hand of my righteousness.
Genesis 1:26: And God said, Let us make man in our image, after our likeness: and let them have dominion over the fish of the sea, and over the fowl of the air, and over the cattle, and over all the earth, and over every creeping thing that creepeth upon the earth.
Matthew 11:29: Take my yoke upon you, and learn of me; for I am meek and lowly in heart: and ye shall find rest unto your souls.
John 16:33: These things I have spoken unto you, that in me ye might have peace. In the world ye shall have tribulation: but be of good cheer; I have overcome the world.
Acts 1:8: But ye shall receive power, after that the Holy Ghost is come upon you: and ye shall be witnesses unto me both in Jerusalem, and in all Judæa, and in Samaria, and unto the uttermost part of the earth.
II Timothy 1:7: For God hath not given us the spirit of fear; but of power, and of love, and of a sound mind.
Isaiah 53:4: Surely he hath borne our griefs, and carried our sorrows: yet we did esteem him stricken, smitten of God, and afflicted.
II Corinthians 5:21: For he hath made him to be sin for us, who knew no sin; that we might be made the righteousness of God in him.
Romans 15:13: Now the God of hope fill you with all joy and peace in believing, that ye may abound in hope, through the power of the Holy Ghost.
John 11:25: Jesus said unto her, I am the resurrection, and the life: he that believeth in me, though he were dead, yet shall he live:
Hebrews 11:6: But without faith it is impossible to please him: for he that cometh to God must believe that he is, and that he is a rewarder of them that diligently seek him.
John 5:24: Verily, verily, I say unto you, He that heareth my word, and believeth on him that sent me, hath everlasting life, and shall not come into condemnation; but is passed from death unto life.
James 1:2: My brethren, count it all joy when ye fall into divers temptations;
Isaiah 53:6: All we like sheep have gone astray; we have turned every one to his own way; and the LORD hath laid on him the iniquity of us all.
Acts 2:38: Then Peter said unto them, Repent, and be baptized every one of you in the name of Jesus Christ for the remission of sins, and ye shall receive the gift of the Holy Ghost.
Ephesians 3:20: Now unto him that is able to do exceeding abundantly above all that we ask or think, according to the power that worketh in us,
Matthew 11:30: For my yoke is easy, and my burden is light.
Genesis 1:27: So God created man in his own image, in the image of God created he him; male and female created he them.
Colossians 3:12: Put on therefore, as the elect of God, holy and beloved, bowels of mercies, kindness, humbleness of mind, meekness, longsuffering;
Hebrews 12:1: Wherefore seeing we also are compassed about with so great a cloud of witnesses, let us lay aside every weight, and the sin which doth so easily beset us, and let us run with patience the race that is set before us,
James 5:16: Confess your faults one to another, and pray one for another, that ye may be healed. The effectual fervent prayer of a righteous man availeth much.
Acts 17:11: These were more noble than those in Thessalonica, in that they received the word with all readiness of mind, and searched the scriptures daily, whether those things were so.
Philippians 4:19: But my God shall supply all your need according to his riches in glory by Christ Jesus.
John 1:1: In the beginning was the Word, and the Word was with God, and the Word was God.
I Corinthians 6:19: What? know ye not that your body is the temple of the Holy Ghost which is in you, which ye have of God, and ye are not your own?
I John 3:16: Hereby perceive we the love of God, because he laid down his life for us: and we ought to lay down our lives for the brethren.
Psalms 133:1: Behold, how good and how pleasant it is for brethren to dwell together in unity!
A Song of degrees of David.
John 14:27: Peace I leave with you, my peace I give unto you: not as the world giveth, give I unto you. Let not your heart be troubled, neither let it be afraid.
Hebrews 4:12: For the word of God is quick, and powerful, and sharper than any twoedged sword, piercing even to the dividing asunder of soul and spirit, and of the joints and marrow, and is a discerner of the thoughts and intents of the heart.
John 15:13: Greater love hath no man than this, that a man lay down his life for his friends.
Micah 6:8: He hath shewed thee, O man, what is good; and what doth the LORD require of thee, but to do justly, and to love mercy, and to walk humbly with thy God?
Romans 10:17: So then faith cometh by hearing, and hearing by the word of God.
John 1:12: But as many as received him, to them gave he power to become the sons of God, even to them that believe on his name:
James 1:12: Blessed is the man that endureth temptation: for when he is tried, he shall receive the crown of life, which the Lord hath promised to them that love him.
James 1:3: Knowing this, that the trying of your faith worketh patience.
Romans 8:38: For I am persuaded, that neither death, nor life, nor angels, nor principalities, nor powers, nor things present, nor things to come,
Romans 8:39: Nor height, nor depth, nor any other creature, shall be able to separate us from the love of God, which is in Christ Jesus our Lord.
Hebrews 10:25: Not forsaking the assembling of ourselves together, as the manner of some is; but exhorting one another: and so much the more, as ye see the day approaching.
II Peter 1:4: Whereby are given unto us exceeding great and precious promises: that by these ye might be partakers of the divine nature, having escaped the corruption that is in the world through lust.
Philippians 1:6: Being confident of this very thing, that he which hath begun a good work in you will perform it until the day of Jesus Christ:
Psalms 133:3: As the dew of Hermon, and as the dew that descended upon the mountains of Zion: for there the LORD commanded the blessing, even life for evermore. 
Hebrews 4:16: Let us therefore come boldly unto the throne of grace, that we may obtain mercy, and find grace to help in time of need.
Psalms 37:4: Delight thyself also in the LORD; and he shall give thee the desires of thine heart.
John 3:17: For God sent not his Son into the world to condemn the world; but that the world through him might be saved.
Acts 4:12: Neither is there salvation in any other: for there is none other name under heaven given among men, whereby we must be saved.
Isaiah 26:3: Thou wilt keep him in perfect peace, whose mind is stayed on thee: because he trusteth in thee.
I Peter 2:24: Who his own self bare our sins in his own body on the tree, that we, being dead to sins, should live unto righteousness: by whose stripes ye were healed.
Joshua 1:8: This book of the law shall not depart out of thy mouth; but thou shalt meditate therein day and night, that thou mayest observe to do according to all that is written therein: for then thou shalt make thy way prosperous, and then thou shalt have good success.
Matthew 28:18: And Jesus came and spake unto them, saying, All power is given unto me in heaven and in earth.
Colossians 3:23: And whatsoever ye do, do it heartily, as to the Lord, and not unto men;
Matthew 22:37: Jesus said unto him, Thou shalt love the Lord thy God with all thy heart, and with all thy soul, and with all thy mind.
Psalms 133:2: It is like the precious ointment upon the head, that ran down upon the beard, even Aaron's beard: that went down to the skirts of his garments;
Matthew 5:16: Let your light so shine before men, that they may see your good works, and glorify your Father which is in heaven.
Isaiah 55:8: For my thoughts are not your thoughts, neither are your ways my ways, saith the LORD.
Hebrews 4:15: For we have not an high priest which cannot be touched with the feeling of our infirmities; but was in all points tempted like as we are, yet without sin.
John 13:35: By this shall all men know that ye are my disciples, if ye have love one to another.
VERSES_ALELUYA;
} // Class OO_Bible_widget_aleluya ends here