import { Link } from "@inertiajs/react";
import { Container } from "@radix-ui/themes";
import { PropsWithChildren } from "react";

export default function Guest({ children }: PropsWithChildren) {
    return (
        <Container size="3" px="4">
            <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                <div>
                    <Link href="/"></Link>
                </div>

                <div className="w-full sm:max-w-md mt-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {children}
                </div>
            </div>
        </Container>
    );
}
