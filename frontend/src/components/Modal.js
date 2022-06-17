import React, {useContext } from 'react'
import { StateContext } from "../context/State";

import { Player,
    ControlBar,
    ReplayControl,
    ForwardControl,
    FullscreenToggle,
    CurrentTimeDisplay,
    DurationDisplay,
    TimeDivider,
    PlaybackRateMenuButton,
    VolumeMenuButton } from 'video-react';

import useCursorHandlers from "../hooks/useCursorHandlers";



    
function Modal() {

    const { settings } = useContext(StateContext);

    const {isModalOpen, closeModal, videoRef} = useContext(StateContext);
    const cursorHandlers = useCursorHandlers();

    let video_src = null;

    if( settings?.video_src_type === "file" ) {
        video_src = `${process.env.REACT_APP_UPLOADS_URL}/${settings?.video_url_1}`
    } else {
        video_src = settings?.video_link_url
    }
    
    window.addEventListener("orientationchange", function() {
        this.setTimeout( ()=> {
            document.querySelector(".App").classList.remove('animating');
        }, 500)
    }, false);

    // muted={ !isModalOpen ? false : true }
    
    return (
        <>
            <div className={`${ isModalOpen ? 'modal-overlay show-modal' : 'modal-overlay ' }`}
                { ...cursorHandlers } >
                    
                <div className={`modal-container ${ isModalOpen ? 'show-cursor' : 'hide-cursor' }`}>

                    <div className={`custom-video-container ${ !isModalOpen ? 'hide-container' : '' }`} >

                    { ( video_src ) ? 
                        <Player playsInline autoPlay={true}  ref={videoRef} {...cursorHandlers} muted={true}>

                            <source src={`${video_src}`} { ...cursorHandlers } />

                            <ControlBar>
                                <ForwardControl disabled />
                                <CurrentTimeDisplay disabled />
                                <TimeDivider disabled />
                                <PlaybackRateMenuButton disabled />

                                <FullscreenToggle enabled/>
                                <DurationDisplay disabled />
                                <VolumeMenuButton disabled />
                                <ReplayControl  disabled/>
                            </ControlBar>

                        </Player>
                    : " " }
                    {/* <VideoProgress
                        progressStart="BottomLeft"
                        type="BottomLine"
                        pathColor="white"
                        pathWidth="3px"
                        pathBorderRadius="2px"
                        src='http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4'
                        // controls
                        onClick={playOrPause}
                        ref={videoRef}
                    /> */}
                    </div>


                    <button onClick={closeModal}
                        className={`close-modal-btn ${
                            isModalOpen ? 'show-cursor' : 'hide-cursor'
                        }`}
                    >
                    {/* &#x2715; */}
                    </button>
                </div>
            </div>
        </>
    )
}

export default Modal
