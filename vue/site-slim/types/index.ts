
export { };

declare global {
    interface Patient {
        deferential?: Boolean;
        start: ResultData;
        end: ResultData,
    }
    interface ResultData {
        weight: Number;
        time?: Number;
        BFI:Number;
        photos: String[];
    }
}


